import React from "react";
import Header from "../layouts/Header";

export function About() {
    return <>
        <Header
            title={"Qui sommes-nous ?"} 
            subtitle={"Tout ce qu'il faut pour nous connaitre"}
        />

        <div className="container py-3">
            <h1 className="text-center">A propos de nous</h1>
        </div>
    </>
}