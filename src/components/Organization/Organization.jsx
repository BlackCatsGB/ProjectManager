import React, { PureComponent, Fragment } from 'react';

import './Organization.sass';

export default class Organization extends PureComponent {
    render() {
        const { data } = this.props;

        return (
            <Fragment>
                <ul className='container'>
                    <li>
                        <h3>organizations</h3>
                        <p>{data.organizations}</p>
                    </li>
                    <li>
                        <h3>dishes</h3>
                        <p>{data.dishes}</p>
                    </li>
                </ul>
            </Fragment>
        );
    }
}