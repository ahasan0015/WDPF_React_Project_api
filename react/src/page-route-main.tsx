import ManageUsers from './components/pages/users/ManageUsers.tsx';
import CreateUsers from './components/pages/users/CreateUsers.tsx';
import EditUsers from './components/pages/users/EditUsers.tsx';
import DetailsUsers from './components/pages/users/DetailsUsers.tsx';



// Users Routes
  {path: '/users', element: <ManageUsers/>},
  {path: '/create-user', element: <CreateUsers/>},
  {path: '/user/edit/:id', element: <EditUsers/>},
  {path: '/user/details/:id', element: <DetailsUsers/>},
