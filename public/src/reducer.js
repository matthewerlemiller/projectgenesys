import authReducer from './ducks/auth';
import pageReducer from './ducks/routing';

export default {
    auth: authReducer,
    currentPage: pageReducer
}