import React, { PureComponent, Fragment } from 'react';

import Organization from 'components/Organization';

export default class OrganizationContainer extends PureComponent {
    
    constructor(props) {
        super(props);

        this.state = {
            loading: true,
            organizations: []
        };
    }

    componentDidMount() {
        fetch('http://dev.service.lookatmenu.com/search/search?language=russian&searchText=l')
            .then(response => response.json())
            .then(organizations => {
                this.setState({
                    loading: false,
                    organizations
                })
            })
            .catch(() => {
                this.setState({ loading: false });
            })
    }

    render() {
        const { loading, organizations } = this.state;

        return (
            <Fragment>
                <div>
                    {loading ? <div>Loading...</div> : <Organization data={organizations} />}
                </div>
            </Fragment>
        );
    }
}