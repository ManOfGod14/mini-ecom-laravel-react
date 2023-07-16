import React from "react";
import Navbar from './pages/layouts/Navbar';
import Footer from './pages/layouts/Footer';
import { Outlet } from "react-router-dom";

function App() {
  return (
    <>
      <Navbar />

      <Outlet />

      <Footer />
    </>
  );
}

export default App;
