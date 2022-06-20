/* eslint no-use-before-define: "off" */
import { useEffect, useState } from 'react';
import { useNavigate } from 'react-router-dom';

import useAlerts from './useAlerts';

import axios from '../utils/axios';

export default function useAuth() {
    const { setAlerts } = useAlerts();
    const [authenticated, setAuthenticated] = useState(false);
    const navigate = useNavigate(false);

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

    return { login, register, authenticated };
}
