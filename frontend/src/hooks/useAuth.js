import useAlerts from './useAlerts';

import axios from '../utils/axios';

export default function useAuth() {
    const { setAlerts } = useAlerts();

    async function register(user) {
        let msgText = 'Cadastro realizado com sucesso!';
        let msgType = 'success';

        try {
            await axios.post('/signup', user).then((res) => {
                return res.data;
            });
        } catch (error) {
            msgText = error.response.data.msg;
            msgType = 'danger';
        }

        setAlerts(msgText, msgType);
    }

    return { register };
}
