import UserList from 'containers/UserListContainer';
import PostList from 'containers/PostListContainer';
import Organization from 'containers/OrganizationContainer';
import Project from 'containers/ProjectContainer';

export default [
    {
        path: '/projects',
        exact: true,
        component: PostList
    },
    {
        path: '/projects/:id',
        exact: true,
        component: Project
    },
    {
        path: '/users',
        exact: true,
        component: UserList
    },
    {
        path: '/organization',
        exact: true,
        component: Organization
    }
]