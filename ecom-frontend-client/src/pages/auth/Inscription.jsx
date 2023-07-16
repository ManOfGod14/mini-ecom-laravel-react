import React, { 
    useEffect,
    useState 
} from "react";
import Header from "../layouts/Header";
import axios from "axios";
import { notifyToTopRight } from "../../services/notifs/Toastify";

function Inscription() {
    const [civilities, setCivilities] = useState([])
    const [countries, setCountries] = useState([])

    // axios.get('http://127.0.0.1:8000/api/front/globals/civilities', {
    //     headers: {
    //         'Accept': 'application/json'
    //     }
    // })
    // .then(reponse => {
    //     // les traitement à faire
    //     const civilities = response.result;
    // })
    // .catch(error => {
    //     notifyToTopRight('error', error)
    // })

    // methode asynchrone pour récupérer les données de civilities
    const getCivilities = async () => {
        try {
            const response = await axios.get(process.env.REACT_APP_FRONT_API_URL+'globals/civilities');
            // console.log(response);
            // console.log(response.data);
            if(response.data && response.data.type === 'success') {
                setCivilities(response.data.result);
            } else {
                setCivilities([]);
            }
        } catch (e) {
            console.error(e)
        }
    }

    const getCountries = async () => {
        try {
            const response = await axios.get(process.env.REACT_APP_FRONT_API_URL+'globals/countries');
            if(response.data && response.data.type === 'success') {
                setCountries(response.data.result);
            } else {
                setCountries([]);
            }
        } catch (e) {
            console.error(e)
        }
    }

    const handleChange = (e) => {
        e.preventDefault()
        console.log(e.target.value)
    }

    // gérer le cycle de vie du composant (montage et démontage)
    useEffect(() => {
        getCivilities();
        getCountries();
    }, [])

    // console.log(process.env.REACT_APP_FRONT_API_URL)
    // console.log(civilities)

    return <>
        <Header 
            title={"Inscription"} 
            subtitle={"Inscrivez-vous pour avoir faciliter vos achats"}
        />

        <div className="container py-3">
            <h1 className="text-center">Formulaire d'inscription</h1>

            <form action="" method="post">
                <div className="row">
                    <div className="form-group col-md-6 mb-3">
                        <label htmlFor="last_name">
                            Nom de famille <span className="text-danger">*</span>
                        </label>
                        <input type="text" name="last_name" id="last_name" className="form-control" required 
                            value={''}
                            onChange={handleChange}
                        />
                    </div>

                    <div className="form-group col-md-6 mb-3">
                        <label htmlFor="first_name">
                            Prénom(s) <span className="text-danger">*</span>
                        </label>
                        <input type="text" name="first_name" id="first_name" className="form-control" required 
                            value={''}
                            onChange={handleChange}
                        />
                    </div>

                    <div className="form-group col-md-6 mb-3">
                        <label htmlFor="username">
                            Username <span className="text-danger">*</span>
                        </label>
                        <input type="text" name="username" id="username" className="form-control" required 
                            value={''}
                            onChange={handleChange}
                        />
                    </div>

                    <div className="form-group col-md-6 mb-3">
                        <label htmlFor="email">
                            Email <span className="text-danger">*</span>
                        </label>
                        <input type="email" name="email" id="email" className="form-control" required 
                            value={''}
                            onChange={handleChange}
                        />
                    </div>

                    <div className="form-group col-md-6 mb-3">
                        <label htmlFor="password">
                            Password <span className="text-danger">*</span>
                        </label>
                        <input type="password" name="password" id="password" className="form-control" required 
                            value={''}
                            onChange={handleChange}
                        />
                    </div>

                    <div className="form-group col-md-6 mb-3">
                        <label htmlFor="password_confirmation">
                            Confirm Password <span className="text-danger">*</span>
                        </label>
                        <input type="password" name="password_confirmation" id="password_confirmation" className="form-control" required 
                            value={''}
                            onChange={handleChange}
                        />
                        <div className="py-1">
                            <span id="pwd_message"></span>
                        </div>
                    </div>

                    <div className="form-group col-md-6 mb-3">
                        <label htmlFor="civility_id">
                            Civility (Sex) <span className="text-danger">*</span>
                        </label>
                        <select name="civility_id" id="civility_id" className="form-select" required onChange={handleChange}>
                            <option value="">-- Sélectionnez le sex --</option>
                            {
                                civilities.map((civilityItem, civilityIndex) => {
                                    return <option value={civilityItem.id} key={'civility_'+civilityIndex}>
                                        {civilityItem.sex}
                                    </option>
                                })
                            }
                        </select>
                    </div>

                    <div className="form-group col-md-6 mb-3">
                        <label htmlFor="country_id">
                            Votre pays <span className="text-danger">*</span>
                        </label>
                        <select name="country_id" id="country_id" className="form-select" required onChange={handleChange}>
                            <option value="">-- Sélectionnez le pays --</option>
                            {
                                countries.map((countryItem, countryIndex) => {
                                    return <option value={countryItem.id} key={'country_'+countryIndex}>
                                        {countryItem.name}
                                    </option>
                                })
                            }
                        </select>
                    </div>

                    <div className="form-group col-md-6 mb-3">
                        <label htmlFor="city_name">
                            Ville de résidence <span className="text-danger">*</span>
                        </label>
                        <input type="text" name="city_name" id="city_name" className="form-control" required 
                            value={''}
                            onChange={handleChange}
                        />
                    </div>

                    <div className="form-group col-md-6 mb-3">
                        <label htmlFor="phone_number">
                            N° de téléphone <span className="text-danger">*</span>
                        </label>
                        <input type="text" name="phone_number" id="phone_number" className="form-control" required 
                            value={''}
                            onChange={handleChange}
                        />
                    </div>

                    <div className="form-group col-md-12 mb-3">
                        <button type="submit" className="btn btn-primary w-100">
                            Enregistrer
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </>
}

export default Inscription;