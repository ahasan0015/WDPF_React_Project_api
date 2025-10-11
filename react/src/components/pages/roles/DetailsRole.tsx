import { Link, useParams } from "react-router-dom";
import api from "../../../config";
import { useEffect, useState } from "react";
import type { Role } from "../../../interfaces/role.interface";
import roleDefault from "../../../interfaces/role.interface";

function DetailsRole() {
  const [role, setRole] = useState<Role>(roleDefault);
  const { id } = useParams();

  useEffect(() => {
    document.title = "Details Role";
    api.get("role?id=" + id)
      .then((res) => {
        setRole(res.data);
      })
      .catch((err) => {
        console.error(err);
      });
  }, [id]);

  return (
    <div className="container-xxl flex-grow-1 container-p-y">
      <h4 className="fw-bold py-3 mb-4">
        <Link to="/roles" className="text-muted fw-light">Roles /</Link> Details
      </h4>
      <div className="card">
        <div className="table-responsive text-nowrap">
          <table className="table table-bordered">
            <tbody>
              <tr>
                <th>Role Id</th>
                <td>{role.role_id}</td>
              </tr>
              <tr>
                <th>Role Name</th>
                <td>{role.role_name}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  );
}

export default DetailsRole;