import { Link, useParams } from "react-router-dom";
import api from "../../../config";
import { useEffect, useState } from "react";
import type { User } from "../../../interfaces/user.interface";
import userDefault from "../../../interfaces/user.interface";

function EditUser() {
    const [user, setUser] = useState<User>(userDefault);
    const { id } = useParams();

    useEffect(() => {
        document.title = "Edit User";
        getDataById();
        getRoles();
    }, []);

    const getDataById = () => {
        api.get("users/" + id)
        .then((res) => {
            setUser(res.data);
        })
        .catch((err) => {
            console.error(err);
        });
    };
    const [roles, setRole] = useState([]);
    const getRoles = () => {
        api.get("roles")
        .then((res) => {
            setRole(res.data);
        })
        .catch((err) => {
            console.error(err);
        });
    };
    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        api.put("edit-user?id=" + id, user)
        .then((res) => {
            console.log(res.data);
        })
        .catch((err) => {
            console.error(err);
        });
    };
    return (
        <>
        <div className="container-xxl flex-grow-1 container-p-y">
          <h4 className="fw-bold py-3 mb-4">
            <Link to="/users" className="text-muted fw-light">Users /</Link> Edit
          </h4>
          <div className="card mt-3">
            <h5 className="card-header">Edit User</h5>
            <div className="card-body">
                <form onSubmit={handleSubmit}>
                    <div className="mb-3">
                        <label className="form-label">Role Id</label>
                        <select name="role_id" className="form-select"
                        value={user.role_id}
                        onChange={(e) => setUser({...user, role_id: parseInt(e.target.value)})}>
                            {
                                roles.map((item) =>
                                    <option value={item.id} key={item.id}>{item.name}</option>
                                )
                            }
                        </select>
                    </div>
                    <div className="mb-3">
                        <label className="form-label">Name</label>
                        <input type="text" name="name" className="form-control"
                        value={user.name}
                        onChange={(e) => setUser({...user, name: e.target.value})} />
                    </div>
                    <div className="mb-3">
                        <label className="form-label">Email</label>
                        <input type="text" name="email" className="form-control"
                        value={user.email}
                        onChange={(e) => setUser({...user, email: e.target.value})} />
                    </div>
                    <div className="mb-3">
                        <label className="form-label">Password</label>
                        <input type="text" name="password" className="form-control"
                        value={user.password}
                        onChange={(e) => setUser({...user, password: e.target.value})} />
                    </div>
                    <div className="mb-3">
                        <label className="form-label">Phone</label>
                        <input type="text" name="phone" className="form-control"
                        value={user.phone}
                        onChange={(e) => setUser({...user, phone: e.target.value})} />
                    </div>
                    <div className="mb-3">
                        <label className="form-label">Created At</label>
                        <input type="text" name="created_at" className="form-control"
                        value={user.created_at}
                        onChange={(e) => setUser({...user, created_at: e.target.value})} />
                    </div>
                    <button type="submit" className="btn btn-primary">Update</button>
                </form>
            </div>
          </div>
        </div>
        </>
    );
}

export default EditUser;