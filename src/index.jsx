import React, { PureComponent, Fragment } from 'react';
import ReactDom from 'react-dom';
import { BrowserRouter, Route, Switch } from 'react-router-dom';

import './style.sass';

import Navigation from 'components/Navigation/Navigation.jsx';

import routes from './routes';

class App extends PureComponent {
    render() {
        return (
            <BrowserRouter>
                <Fragment>
                    <Navigation />
                    <Switch>
                        {routes.map((page, id) => <Route key={id} {...page} />)}
                    </Switch>
                </Fragment>
            </BrowserRouter>
        );
    }
}

ReactDom.render(<App />, document.getElementById('app'));