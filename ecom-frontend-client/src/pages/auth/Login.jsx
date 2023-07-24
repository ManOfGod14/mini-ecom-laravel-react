import React, { useState } from "react";
import Header from "../layouts/Header";
import {useForm} from 'react-hook-form'
import { useNavigate } from "react-router-dom";
import axios from "axios";
import { notifyToTopRight } from "../../services/notifs/Toastify";
import { assignSessionAuth } from "../../services/Auth";

const initialForm = {
    email: {required: 'Ce champ est requis !'},
    password: {required: 'Ce champ est requis !'},
}

function Login() {
    const [loading, setLoading] = useState(false)
    const navigate = useNavigate()

    const {
        register,
        handleSubmit,
        control,
        watch,
        formState: {errors, isValid, isSubmitSuccessful}
    } = useForm({
        mode: 'onBlur'
    });

    const clickToLogin = async (params) => {
        // console.log(params)
        setLoading(true)
        
        const response = await axios.post(process.env.REACT_APP_FRONT_API_URL+'auth/login', params)
        
        if(response.data) {
            if(response.data?.type === 'success' && response.data?.result) {
                // je stocke les données de connexion du user qui l'api m'a retourné dans le localStorage
                // await window.localStorage.setItem('_authToken', JSON.stringify(response.data?.result))
                assignSessionAuth(response.data?.result)

                navigate('/account/profile')
                notifyToTopRight('success', response.data?.message)
                
                setTimeout(window.location.reload(), 1500)
            } else {
                notifyToTopRight('error', response.data?.message)
            }
        } else {
            notifyToTopRight('error', "Quelque chose s'est mal passée !")
        }

        setLoading(false)
    }

    return <>
        <Header 
            title={"Connexion"} 
            subtitle={"Authentifiez-vous pour avoir accès à votre tableau de bord"}
        />

        <div className="container py-3">
            <h1 className="text-center">Auhtentification</h1>

            <form onSubmit={handleSubmit(clickToLogin)}>
                <div className="row">
                    <div className="form-group col-md-12 mb-3">
                        <label htmlFor="email">
                            Email <span className="text-danger">*</span>
                        </label>
                        <input type="email" name="email" id="email" className="form-control"
                            {...register('email', initialForm.email)}
                        />
                        <small className="text-danger">{errors.email?.message}</small>
                    </div>

                    <div className="form-group col-md-12 mb-3">
                        <label htmlFor="password">
                            Password <span className="text-danger">*</span>
                        </label>
                        <input type="password" name="password" id="password" className="form-control" 
                            {...register('password', initialForm.password)}
                        />
                        <small className="text-danger">{errors.password?.message}</small>
                    </div>

                    <div className="form-group col-md-12 mb-3">
                        <button type="submit" className="btn btn-primary w-100" disabled={loading}>
                            { !loading && <span>Je me connecte</span> }

                            { loading && <span>Veuillez pattienter...</span> }
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </>
}

export default Login;