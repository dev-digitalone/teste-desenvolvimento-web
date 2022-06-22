import React, { createContext } from 'react';

import { Spinner } from 'react-bootstrap';
import useAuth from '../hooks/useAuth';

const Context = createContext();

function UserProvider({ children }) {
    const {
        authenticated,
        user,
        register,
        login,
        logout,
        loading,
        forgotPassword,
        resetPassword,
    } = useAuth();

    if (loading) {
        return (
            <div
                className="d-flex justify-content-center align-items-center"
                style={{ minHeight: '100vh' }}
            >
                <Spinner animation="border" role="status">
                    <span className="visually-hidden">Loading...</span>
                </Spinner>
            </div>
        );
    }

    return (
        <Context.Provider
            value={{
                authenticated,
                user,
                register,
                login,
                logout,
                loading,
                forgotPassword,
                resetPassword,
            }}
        >
            {children}
        </Context.Provider>
    );
}

export { Context, UserProvider };
