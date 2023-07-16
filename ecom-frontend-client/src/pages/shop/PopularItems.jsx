import React from "react";
import Header from "../layouts/Header";

export function PopularItems() {
    return <>
        <Header
            title={"Produits populaires"} 
            subtitle={"Nos produits les plus populaires"}
        />

        <div className="container py-3">
            <h1 className="text-center">Liste de tous nos produits populaires</h1>
        </div>
    </>
}