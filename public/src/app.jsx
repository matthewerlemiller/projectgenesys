import React from 'react';
import { Provider } from 'react-redux';
import RootPage from './ducks/routing/RootPage';
import store from './store';

function App() {
    return (
        <Provider store={store}>
            <RootPage/>
        </Provider>
    )
}

export default App;