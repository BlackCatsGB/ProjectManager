import React, { PureComponent, Fragment } from 'react';

import Project from 'components/Project';

export default class ProjectContainer extends PureComponent {
    
    constructor(props) {
        super(props);

        this.state = {
            loading: true,
            project: {}
        };
    }

    loadProjectInfo() {
        const { match } = this.props;
        fetch(`https://jsonplaceholder.typicode.com/posts/${match.params.id}`)
            .then(response => response.json())
            .then(project => {
                this.setState({
                    loading: false,
                    project
                })
            })
            .catch(() => {
                this.setState({ loading: false });
            })
    }

    componentDidMount() {
        this.loadProjectInfo();
    }

    render() {
        const { loading, project } = this.state;

        return (
            <Fragment>
                <div>
                    {loading ? <div>Идёт загрузка...</div> : <Project project={project} />}
                </div>
            </Fragment>
        );
    }
}