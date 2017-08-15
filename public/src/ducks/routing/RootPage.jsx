import React from 'react';
import PropTypes from 'prop-types';
import { connect } from 'react-redux';
import { LoginChunk } from './chunks';
import { StyleSheet, css } from 'aphrodite/no-important';
import colors from 'utils/colors';
import reset from 'styles/reset.css';

RootPage.propTypes = {
    currentPage: PropTypes.string.isRequired
}

function RootPage(props) {
    const Page = pages[props.currentPage];
    return (
        <div className={css(styles.base, props.currentPage === 'login' && styles.blue)}>
            {Page ? <Page /> : null}
        </div>
    )
}
const styles = StyleSheet.create({
    base: {
        width: '100vw',
        height: '100vh'
    },
    blue: {
        backgroundColor: colors.primary
    }
})
const pages = {
    login: LoginChunk,
}
const mapStateToProps = ({ currentPage }) => ({ currentPage })

export default connect(mapStateToProps)(RootPage);