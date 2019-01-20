import React, { PureComponent, Fragment } from 'react';
import { Link, withRouter } from 'react-router-dom';
import classNames from 'classnames';

import './Navigation.sass';

class Navigation extends PureComponent {
    render() {

        const { location } = this.props;

        return (
            <ul className="navi">
                <li className={classNames({ active: location.pathname === '/projects' })}>
                    <Link className='nav-link' to="/projects">Проекты (тест)</Link>
                </li>
                <li className={classNames({ active: location.pathname === '/users' })}>
                    <Link className='nav-link' to="/users">Пользователи (тест)</Link>
                </li>
                <li className={classNames({ active: location.pathname === '/organization' })}>
                    <Link className='nav-link' to="/organization">Организация (тест)</Link>
                </li>
            </ul>
        );
    }
}

export default withRouter(Navigation);