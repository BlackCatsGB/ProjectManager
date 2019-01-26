import React, {PureComponent, Fragment} from 'react';

import UserList from 'components/UserList';

export default class UserListContainer extends PureComponent {

    constructor(props) {
        super(props);

        this.state = {
            loading: true,
            users: []
        };
    }

    componentDidMount() {
        fetch('https://jsonplaceholder.typicode.com/users')
        .then(response => response.json())
        .then(users => {
            this.setState({
                loading: false,
                users
            })
        })
        .catch(()=> {
            this.setState({ loading: false });
        })
    }

    render() {
        const {loading, users} = this.state;
        return (
            <Fragment>
                <div>
                    {loading ? <div>Секундочку, идёт загрузка...</div> : <UserList users={users} />}
                </div>
            </Fragment>
        );
    }
}