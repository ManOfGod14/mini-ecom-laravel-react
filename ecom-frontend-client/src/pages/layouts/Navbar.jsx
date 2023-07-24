import React from "react";
import { Link } from "react-router-dom";
import { logout } from "../../services/Auth";
import { auth } from "../../services/Auth";

function Navbar() {
    // console.log(auth)

    return <>
        <nav className="navbar navbar-expand-lg navbar-light bg-light">
            <div className="container px-4 px-lg-5">
                <Link to={'/'} className="navbar-brand" aria-current="page">
                    SHOP REACT
                </Link>
                <button className="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span className="navbar-toggler-icon"></span>
                </button>

                <div className="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul className="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li className="nav-item">
                            <Link to={'/'} className="nav-link active" aria-current="page">
                                Home
                            </Link>
                        </li>

                        <li className="nav-item">
                            <Link to={'/about'} className="nav-link">
                            About
                            </Link>
                        </li>

                        <li className="nav-item dropdown">
                            <Link to={'#'} className="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Shop
                            </Link>
                            <ul className="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li>
                                    <Link to={'/shop/all-products'} className="dropdown-item">
                                        All Products
                                    </Link>
                                </li>
                                <li><hr className="dropdown-divider" /></li>
                                <li>
                                    <Link to={'/shop/popular-items'} className="dropdown-item">
                                        Popular Items
                                    </Link>
                                </li>
                                <li>
                                    <Link to={'/shop/new-arrivals'} className="dropdown-item">
                                        New Arrivals
                                    </Link>
                                </li>
                            </ul>
                        </li>

                        <li className="nav-item">
                            <Link to={'/contact'} className="nav-link">
                                Contact
                            </Link>
                        </li>
                    </ul>

                    <div className="d-flex">
                        {
                            auth?.access_token ?
                            <>
                                <Link to={'/account/profile'}>
                                    <button className="btn btn-secondary btn-sm me-2">
                                        <i className="bi bi-person-circle me-1"></i> Mon compte
                                    </button>
                                </Link>

                                <Link onClick={() => logout()}>
                                    <button className="btn btn-danger btn-sm me-2">
                                        <i className="bi bi-box-arrow-right me-1"></i> Déconnexion
                                    </button>
                                </Link>
                            </>
                            :
                            <>
                                <Link to={'/auth/login'}>
                                    <button className="btn btn-success btn-sm me-2">
                                        <i className="bi bi-box-arrow-in-right me-1"></i> Connexion
                                    </button>
                                </Link>

                                <Link to={'/auth/inscription'}>
                                    <button className="btn btn-primary btn-sm me-2">
                                        <i className="bi bi-box-arrow-in-left me-1"></i> Inscription
                                    </button>
                                </Link>
                            </>
                        }

                        <form>
                            <button className="btn btn-outline-primary btn-sm" type="submit">
                                <i className="bi bi-cart-fill me-1"></i> Mon panier
                                <span className="badge bg-dark text-white ms-1 rounded-pill">0</span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </nav>
    </>
}

export default Navbar;