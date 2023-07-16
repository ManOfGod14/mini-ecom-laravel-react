import React from "react";
import Header from "../layouts/Header";

export function ContactForm() {
    return <>
        <Header
            title={"Contactez-nous"} 
            subtitle={"Pour tout vos besoins n'hésitez pas à nous contacter"}
        />

        <div className="container py-3">
            <h1 className="text-center">Formulaire de contact</h1>

            <form action="" method="post">
                <div className="row">
                    <div className="form-group col-md-6 mb-3">
                        <label htmlFor="last_name">
                            Votre nom de famille <span className="text-danger">*</span>
                        </label>
                        <input type="text" name="last_name" id="last_name" className="form-control" required />
                    </div>

                    <div className="form-group col-md-6 mb-3">
                        <label htmlFor="first_name">
                            Votre prénom <span className="text-danger">*</span>
                        </label>
                        <input type="text" name="first_name" id="first_name" className="form-control" required />
                    </div>

                    <div className="form-group col-md-12 mb-3">
                        <label htmlFor="email">
                            Votre adresse email <span className="text-danger">*</span>
                        </label>
                        <input type="email" name="email" id="email" className="form-control" required />
                    </div>

                    <div className="form-group col-md-6 mb-3">
                        <label htmlFor="country_id">
                            Votre pays <span className="text-danger">*</span>
                        </label>
                        <select name="country_id" id="country_id" className="form-select" required>
                            <option value="">-- Sélectionnez le pays --</option>
                        </select>
                    </div>

                    <div className="form-group col-md-6 mb-3">
                        <label htmlFor="phone_number">
                            N° téléphone <span className="text-danger">*</span>
                        </label>
                        <input type="text" name="phone_number" id="phone_number" className="form-control" required />
                    </div>
                    
                    <div className="form-group col-md-12 mb-3">
                        <label htmlFor="object">
                            Objet du message <span className="text-danger">*</span>
                        </label>
                        <input type="text" name="object" id="object" className="form-control" required />
                    </div>

                    <div className="form-group col-md-12 mb-3">
                        <label htmlFor="message_content">
                            Votre message <span className="text-danger">*</span>
                        </label>
                        <textarea name="message_content" id="message_content" className="form-control" rows="5" required></textarea>
                    </div>

                    <div className="form-group col-md-12 mb-3">
                        <button type="submit" className="btn btn-primary w-100">
                            Envoyer votre message
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </>
}