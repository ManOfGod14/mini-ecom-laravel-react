import React from "react";
import Header from "../layouts/Header";

export function AllProducts() {
    return <>
        <Header
            title={"Tous les produits"} 
            subtitle={"Tous nos produits à votre honeur"}
        />

        <div className="container py-3">
            <h1 className="text-center">Liste de tous les produits</h1>
        </div>
    </>
}