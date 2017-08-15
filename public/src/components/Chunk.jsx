import React from 'react';
import PropTypes from 'prop-types';

class Chunk extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            LoadedComponent: null
        }
    }

    componentWillMount() {
        this.load(this.props);
    }

    componentWillReceiveProps(nextProps) {
        if (nextProps.load !== this.props.load) {
            this.load(nextProps);
        }
    }

    load(props) {
        this.setState({
            LoadedComponent: null
        });

        props.load().then(mod => {
            this.setState({
                LoadedComponent: mod.default ? mod.default : mod
            })
        })
    }

    render() {
        const { LoadedComponent } = this.state;

        return LoadedComponent ? <LoadedComponent {...this.props} /> : <div></div>;
    }
}

Chunk.propTypes = {
    load: PropTypes.func.isRequired
}

export default Chunk;