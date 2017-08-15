import { ROUTE_LOGIN, ROUTE_DASHBOARD } from './routes';
import { NOT_FOUND } from 'redux-first-router';

/* Pages duck */
export default function(state = '', action) {
    switch(action.type) {
        case ROUTE_LOGIN:
            return 'login';
        case ROUTE_DASHBOARD:
            return 'dashboard';
        case NOT_FOUND:
            return '404'
        default:
            return 'dashboard';
    }
}