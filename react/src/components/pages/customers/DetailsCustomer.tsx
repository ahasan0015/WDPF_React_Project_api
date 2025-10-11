import { Link, useParams } from "react-router-dom";
import api from "../../../config";
import { useEffect, useState } from "react";
import type { Customer } from "../../../interfaces/customer.interface";
import customerDefault from "../../../interfaces/customer.interface";

function DetailsCustomer() {
  const [customer, setCustomer] = useState<Customer>(customerDefault);
  const { id } = useParams();

  useEffect(() => {
    document.title = "Details Customer";
    api.get("customer?id=" + id)
      .then((res) => {
        setCustomer(res.data);
      })
      .catch((err) => {
        console.error(err);
      });
  }, [id]);

  return (
    <div className="container-xxl flex-grow-1 container-p-y">
      <h4 className="fw-bold py-3 mb-4">
        <Link to="/customers" className="text-muted fw-light">Customers /</Link> Details
      </h4>
      <div className="card">
        <div className="table-responsive text-nowrap">
          <table className="table table-bordered">
            <tbody>
              <tr>
                <th>Id</th>
                <td>{customer.id}</td>
              </tr>
              <tr>
                <th>Name</th>
                <td>{customer.name}</td>
              </tr>
              <tr>
                <th>Email</th>
                <td>{customer.email}</td>
              </tr>
              <tr>
                <th>Phone</th>
                <td>{customer.phone}</td>
              </tr>
              <tr>
                <th>Address</th>
                <td>{customer.address}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  );
}

export default DetailsCustomer;