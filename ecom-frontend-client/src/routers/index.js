import React, { Fragment } from "react";
import { Route, Routes } from "react-router-dom";
import App from "../App";
import { Home } from "../pages/home/Home";
import { About } from "../pages/about/About";
import { AllProducts } from "../pages/shop/AllProducts";
import { PopularItems } from "../pages/shop/PopularItems";
import { NewArrivals } from "../pages/shop/NewArrivals";
import { ContactForm } from "../pages/contact/ContactForm";
import Inscription from "../pages/auth/Inscription";
import Login from "../pages/auth/Login";
import { Profile } from "../pages/account/Profile";

const Routers = () => {

    return (
        <Fragment>
            <Routes>
                <Route element={<App />}>
                    <Route path="/" element={<Home />} />
                    <Route path="/home" element={<Home />} />

                    <Route path="/about" element={<About />} />

                    <Route path="/shop/all-products" element={<AllProducts />} />
                    <Route path="/shop/popular-items" element={<PopularItems />} />
                    <Route path="/shop/new-arrivals" element={<NewArrivals />} />

                    <Route path="/contact" element={<ContactForm />} />

                    <Route path="/auth/inscription" element={<Inscription />} />
                    <Route path="/auth/login" element={<Login />} />

                    <Route path="/account/profile" element={<Profile />} />
                </Route>
            </Routes>
        </Fragment>
    )
}

export default Routers