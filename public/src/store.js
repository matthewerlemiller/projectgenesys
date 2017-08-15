import { combineReducers, createStore, applyMiddleware, compose } from 'redux';
import createHistory from 'history/createBrowserHistory';
import { connectRoutes } from 'redux-first-router';
import appReducer from './reducer';
import routes from './ducks/routing/routes';

const history = createHistory();
const { reducer: routesReducer, middleware:routesMiddleware, enhancer: routesEnhancer } = connectRoutes(history, routes);
const reducer = combineReducers({ location: routesReducer, ...appReducer });
const middlewares = [];

middlewares.push(routesMiddleware);

if (process.env.NODE_ENV === 'development') {
    const { createLogger } = require('redux-logger');

    middlewares.push(createLogger({ collapsed: true }));
}

const store = createStore(reducer, compose(routesEnhancer, applyMiddleware(...middlewares), window.__REDUX_DEVTOOLS_EXTENSION__ && window.__REDUX_DEVTOOLS_EXTENSION__()));

export default store;