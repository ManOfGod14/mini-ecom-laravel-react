import React from "react";
import Header from "../layouts/Header";

function Login() {
    return <>
        <Header 
            title={"Connexion"} 
            subtitle={"Authentifiez-vous pour avoir accès à votre tableau de bord"}
        />

        <div className="container py-3">
            <h1 className="text-center">Auhtentification</h1>

            <form action="" method="post">
                <div className="row">
                    <div className="form-group col-md-12 mb-3">
                        <label htmlFor="email">
                            Email <span className="text-danger">*</span>
                        </label>
                        <input type="email" name="email" id="email" className="form-control" required />
                    </div>

                    <div className="form-group col-md-12 mb-3">
                        <label htmlFor="password">
                            Password <span className="text-danger">*</span>
                        </label>
                        <input type="password" name="password" id="password" className="form-control" required />
                    </div>

                    <div className="form-group col-md-12 mb-3">
                        <button type="submit" className="btn btn-primary w-100">
                            Connexion
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </>
}

export default Login;