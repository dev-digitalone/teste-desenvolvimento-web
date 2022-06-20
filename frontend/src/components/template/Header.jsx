import React from 'react';
import { Button, Container, Nav, Navbar } from 'react-bootstrap';
import { Link } from 'react-router-dom';

import { Context } from '../../context/UserContext';

export default function Header() {
    const { authenticated, logout } = React.useContext(Context);

    return (
        <Navbar className="navbar navbar-expand-lg navbar-dark bg-dark">
            <Container className="m-0 mx-3" style={{ maxWidth: '100%' }}>
                <Navbar.Brand className="navbar-brand" href="/">
                    Teste-DigitalOne
                </Navbar.Brand>
                <Nav className="d-flex justify-content-center">
                    {authenticated ? (
                        <Button
                            className="mx-2"
                            variant="outline-primary"
                            onClick={logout}
                        >
                            Sair
                        </Button>
                    ) : (
                        <Link to="/entrar">
                            <Button
                                className="mx-2"
                                variant="outline-primary"
                                type="submit"
                            >
                                Entrar
                            </Button>
                        </Link>
                    )}
                </Nav>
            </Container>
        </Navbar>
    );
}
