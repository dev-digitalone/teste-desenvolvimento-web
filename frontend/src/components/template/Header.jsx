import React from 'react';
import { Link } from 'react-router-dom';

export default function Header() {
    return (
        <nav className="navbar navbar-expand-lg navbar-dark bg-dark">
            <div className="container-fluid">
                {/* <button className="navbar-toggler" type="button">
                    <span className="navbar-toggler-icon"></span>
                </button> */}
                <div className="collapse navbar-collapse d-flex justify-content-between">
                    <a className="navbar-brand" href="/">
                        Teste-DigitalOne
                    </a>
                    {/* Futura funcinalidade ? */}
                    {/* <form
                        className="d-flex justify-content-center"
                        role="search"
                    >
                        <input
                            className="form-control me-2"
                            type="search"
                            placeholder="Search"
                            aria-label="Search"
                        />
                        <button
                            className="btn btn-outline-success"
                            type="submit"
                        >
                            Search
                        </button>
                    </form> */}
                    <div className="d-flex justify-content-center">
                        <div>
                            <Link to="/entrar">
                                <button
                                    className="btn btn-outline-primary mx-2"
                                    type="submit"
                                >
                                    Entrar
                                </button>
                            </Link>
                            <Link to="/registrar">
                                <button
                                    className="btn btn-outline-primary mx-2"
                                    type="submit"
                                >
                                    Cadastrar
                                </button>
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    );
}
