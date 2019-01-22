import React, { PureComponent } from 'react';

export default class Project extends PureComponent {
    render() {
        const { project } = this.props;
        return (
            <div>
                {project.title}
            </div>
        )
    }
}