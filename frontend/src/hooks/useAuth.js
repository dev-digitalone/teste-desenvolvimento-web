/* eslint no-use-before-define: "off" */
import { useEffect, useState } from 'react';
import { useNavigate } from 'react-router-dom';

import useAlerts from './useAlerts';

import axios from '../utils/axios';

export default function useAuth() {
    const { setAlerts } = useAlerts();
    const [authenticated, setAuthenticated] = useState(false);
    const [loading, setLoading] = useState(true);
    const navigate = useNavigate(false);
    const [token] = useState(localStorage.getItem('token') || '');
    const [user, setUser] = useState({});

    useEffect(() => {
        if (token) {
            axios
                .get('/checkUser', {
                    headers: {
                        Authorization: `Bearer ${JSON.parse(token)}`,
                    },
                })
                .then((res) => {
                    setUser(res.data);
                });
        }

        setLoading(false);
    }, [token]);

    useEffect(() => {
        const token = localStorage.getItem('token');

        if (token) {
            axios.defaults.headers.Authorization = `Bearer ${JSON.parse(
                token
            )}`;
            setAuthenticated(true);
        }
    }, []);

    async function register(user) {
        let msgText = 'Cadastro realizado com sucesso!';
        let msgType = 'success';

        try {
            const data = await axios.post('/signup', user).then((res) => {
                return res.data;
            });

            await authUser(data);
        } catch (error) {
            msgText = error.response.data.msg;
            msgType = 'danger';
        }

        setAlerts(msgText, msgType);
    }

    async function authUser(data) {
        setAuthenticated(true);

        localStorage.setItem('token', JSON.stringify(data.token));

        navigate('/');
    }

    async function login(user) {
        let msgText = 'Login realizado com sucesso!';
        let msgType = 'success';

        try {
            const data = await axios.post('/signin', user).then((res) => {
                return res.data;
            });

            await authUser(data);
        } catch (error) {
            msgText = error.response.data.msg;
            msgType = 'danger';
        }

        setAlerts(msgText, msgType);
    }

    function logout() {
        const msgText = 'Logout realizado com sucesso!';
        const msgType = 'success';

        setAuthenticated(false);
        localStorage.removeItem('token');
        axios.defaults.headers.Authorization = undefined;
        navigate('/');

        setAlerts(msgText, msgType);
    }

    async function forgotPassword(email) {
        let msgtype = 'success';

        setLoading(true);

        const data = await axios
            .post('/forgotPassword', email)
            .then((res) => {
                return res.data.msg;
            })
            .catch((error) => {
                msgtype = 'danger';
                return error.response.data.msg;
            });

        setLoading(false);
        setTimeout(() => {
            setAlerts(data, msgtype);
        }, 1000);
    }

    async function resetPassword(password, token) {
        let msgtype = 'success';

        const data = await axios
            .post(`/resetPassword/${token}`, password)
            .then((res) => {
                navigate('/entrar');
                return res.data.msg;
            })
            .catch((error) => {
                msgtype = 'danger';
                return error.response.data.msg;
            });

        setAlerts(data, msgtype);
    }

    return {
        login,
        register,
        logout,
        authenticated,
        user,
        loading,
        forgotPassword,
        resetPassword,
    };
}
