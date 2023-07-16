import React from "react";
import Header from "../layouts/Header";

export function Profile() {
    return <>
        <Header 
            title={"Mon compte"} 
            subtitle={"Bienvenu sur votre tableau de bord"}
        />

        <div className="container py-3">
            <h1 className="text-center">Informations personnelles</h1>
        </div>
    </>
}