// import { useState, useEffect } from 'react';
// import { useNavigate } from 'react-router-dom';

import axios from '../utils/axios';

export default function useAuth() {
    async function register(user) {
        try {
            const data = await axios.post('/signup', user).then((res) => {
                return res.data;
            });

            console.log(data);
        } catch (error) {
            console.log(error);
        }
    }

    return { register };
}
