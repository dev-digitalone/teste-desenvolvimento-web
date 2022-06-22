/* eslint object-shorthand: "off" */
import bus from '../utils/bus';

export default function useAlerts() {
    function setAlerts(msg, type) {
        bus.emit('alertMsg', {
            message: msg,
            type: type,
        });
    }

    return { setAlerts };
}
