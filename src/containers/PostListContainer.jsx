import React, { PureComponent, Fragment } from 'react';

import PostList from 'components/PostList';

export default class PostListContainer extends PureComponent {

    constructor(props) {
        super(props);

        this.state = {
            loading: true,
            page: 1,
            posts: []
        };
    }

    loadPublications() {
        const { page, posts } = this.state;
        if (page === 1) {
            this.setState({ loading: true });
        }
        fetch(`https://jsonplaceholder.typicode.com/posts?limit=10&_page=${page}`)
            .then(response => response.json())
            .then(results => {
                this.setState({
                    loading: false,
                    page: page + 1,
                    posts: posts.concat(results)
                })
            })
            .catch(() => {
                this.setState({ loading: false });
            })
    }

    componentDidMount() {
        this.loadPublications();
    }

    handleLoadMorePublications = () => {
        this.loadPublications();
    }

    render() {
        const { loading, posts } = this.state;
        return (
            <Fragment>
                {loading ? <div>Секундочку, идёт загрузка...</div> : <PostList onLoadMorePublications={this.handleLoadMorePublications} posts={posts} />}
            </Fragment>
        );
    }
}