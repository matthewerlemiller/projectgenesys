/* Auth Duck */
const initialState = {
    fields: {
        center: {
            value: ''
        },
        password: {
            didError: false,
            didInvalidate: false,
            value: ''
        }
    }
}

export default function(state = initialState, action) {
    return state;
}