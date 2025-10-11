import { Link } from "react-router-dom";
import api from "../../../config";
import { useEffect, useState } from "react";
import type { Role } from "../../../interfaces/role.interface";
import roleDefault from "../../../interfaces/role.interface";

function CreateRole() {
    const [role, setRole] = useState<Role>(roleDefault);
    const [roles, setRole] = useState<Role[]>([]);

    useEffect(() => {
        document.title = "Create Role";
            getRoles();
    }, []);

    const getRoles = () => {
        api.get("roles")
        .then((res) => {
            setRole(res.data);
        })
        .catch((err) => {
            console.error(err);
        });

    function handleSubmit(e: React.FormEvent) {
        e.preventDefault();

        api.post("create-role", role)
        .then((res) => {
            console.log(res.data);
        })
        .catch((err) => {
            console.log(err);
        });
    }

    return (
        <>
        <div className="container-xxl flex-grow-1 container-p-y">
          <h4 className="fw-bold py-3 mb-4">
            <Link to="/roles" className="text-muted fw-light">Roles /</Link> Create
          </h4>
          <div className="card mt-3">
            <h5 className="card-header">Create Role</h5>
            <div className="card-body">
                <form onSubmit={handleSubmit}>
                    <div className="mb-3">
                        <label className="form-label">Role Id</label>
                        <select name="role_id" className="form-select" onChange={(e) => setRole({...role, role_id: parseInt(e.target.value)})}>
                            {
                                roles.map((item) =>
                                    <option value={item.id} key={item.id}>{item.name}</option>
                                )
                            }
                        </select>
                    </div>
                    <div className="mb-3">
                        <label className="form-label">Role Name</label>
                        <input type="text" name="role_name" className="form-control" 
                        value={role.role_name} 
                        onChange={(e) => setRole({...role, role_name: e.target.value})} />
                    </div>
                    <button type="submit" className="btn btn-primary">Submit</button>
                </form>
            </div>
          </div>
        </div>
        </>
    );
}

export default CreateRole;