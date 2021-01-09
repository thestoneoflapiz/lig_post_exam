import React from 'react';
import { Switch, Route } from 'react-router';

import Posts from './Posts';
import PostDetails from './PostDetails';
import Login from './Login';
import Register from './Register';
import AdminPosts from './AdminPosts';
import AdminPostDetails from './AdminPostDetails';

import * as routes from '../utils/routes';

const Pages = () => {
  return (
    <main>
      <Switch>
        <Route
          exact
          path={routes.INDEX}
          component={Posts}
        />
        <Route
          exact
          path={routes.POSTS}
          component={Posts}
        />
        <Route
          exact
          path={routes.POST_DETAILS}
          component={PostDetails}
        />
        <Route
          exact
          path={routes.ADMIN_LOGIN}
          component={Login}
        />
        <Route
          exact
          path={routes.ADMIN_REGISTER}
          component={Register}
        />
        <Route
          exact
          path={routes.ADMIN_POSTS}
          component={AdminPosts}
        />
        <Route
          exact
          path={routes.ADMIN_POST_DETAILS}
          component={AdminPostDetails}
        />
      </Switch>
    </main>
  );
};

export default Pages;
