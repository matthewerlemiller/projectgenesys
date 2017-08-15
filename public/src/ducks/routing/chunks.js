import React from 'react';
import Chunk from 'components/Chunk';

function LoginChunk(props) {
    return (
        <Chunk
            load={() => import(/* webpackChunkName: 'login-chunk' */'./LoginPage')}
            {...props}
        />
    )
}


export { LoginChunk }