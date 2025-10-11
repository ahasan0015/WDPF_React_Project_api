import { Link, useParams } from "react-router-dom";
import api from "../../../config";
import { useEffect, useState } from "react";
import type { Customer } from "../../../interfaces/customer.interface";
import customerDefault from "../../../interfaces/customer.interface";

function EditCustomer() {
    const [customer, setCustomer] = useState<Customer>(customerDefault);
    const { id } = useParams();

    useEffect(() => {
        document.title = "Edit Customer";
        getDataById();
    }, []);

    const getDataById = () => {
        api.get("customers/" + id)
        .then((res) => {
            setCustomer(res.data);
        })
        .catch((err) => {
            console.error(err);
        });
    };
    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        api.put("edit-customer?id=" + id, customer)
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
            <Link to="/customers" className="text-muted fw-light">Customers /</Link> Edit
          </h4>
          <div className="card mt-3">
            <h5 className="card-header">Edit Customer</h5>
            <div className="card-body">
                <form onSubmit={handleSubmit}>
                    <div className="mb-3">
                        <label className="form-label">Name</label>
                        <input type="text" name="name" className="form-control"
                        value={customer.name}
                        onChange={(e) => setCustomer({...customer, name: e.target.value})} />
                    </div>
                    <div className="mb-3">
                        <label className="form-label">Email</label>
                        <input type="text" name="email" className="form-control"
                        value={customer.email}
                        onChange={(e) => setCustomer({...customer, email: e.target.value})} />
                    </div>
                    <div className="mb-3">
                        <label className="form-label">Phone</label>
                        <input type="text" name="phone" className="form-control"
                        value={customer.phone}
                        onChange={(e) => setCustomer({...customer, phone: e.target.value})} />
                    </div>
                    <div className="mb-3">
                        <label className="form-label">Address</label>
                        <textarea name="address" className="form-control" rows={4}
                        value={customer.address}
                        onChange={(e) => setCustomer({...customer, address: e.target.value})}></textarea>
                    </div>
                    <button type="submit" className="btn btn-primary">Update</button>
                </form>
            </div>
          </div>
        </div>
        </>
    );
}

export default EditCustomer;