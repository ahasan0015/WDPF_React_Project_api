import { Link, useParams } from "react-router-dom";
import api from "../../../config";
import { useEffect, useState } from "react";
import type { User } from "../../../interfaces/user.interface";
import userDefault from "../../../interfaces/user.interface";

function DetailsUser() {
  const [user, setUser] = useState<User>(userDefault);
  const { id } = useParams();

  useEffect(() => {
    document.title = "Details User";
    api.get("user?id=" + id)
      .then((res) => {
        setUser(res.data);
      })
      .catch((err) => {
        console.error(err);
      });
  }, [id]);

  return (
    <div className="container-xxl flex-grow-1 container-p-y">
      <h4 className="fw-bold py-3 mb-4">
        <Link to="/users" className="text-muted fw-light">Users /</Link> Details
      </h4>
      <div className="card">
        <div className="table-responsive text-nowrap">
          <table className="table table-bordered">
            <tbody>
              <tr>
                <th>User Id</th>
                <td>{user.user_id}</td>
              </tr>
              <tr>
                <th>Role Id</th>
                <td>{user.role_id}</td>
              </tr>
              <tr>
                <th>Name</th>
                <td>{user.name}</td>
              </tr>
              <tr>
                <th>Email</th>
                <td>{user.email}</td>
              </tr>
              <tr>
                <th>Password</th>
                <td>{user.password}</td>
              </tr>
              <tr>
                <th>Phone</th>
                <td>{user.phone}</td>
              </tr>
              <tr>
                <th>Created At</th>
                <td>{user.created_at}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  );
}

export default DetailsUser;