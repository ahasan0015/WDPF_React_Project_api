import { useEffect, useState } from "react";
import api from "../../../config";
import type { Payment } from "../../../interfaces/payment.interface";
import { Link } from "react-router-dom";
import { baseUrl } from "../../../config";

function ManagePayment() {
  const [payments, setPayments] = useState<Payment[]>([]);
  const [paymentId, setPaymentId] = useState<number | undefined>(0);

  useEffect(() => {
    document.title = "Manage Payments";
    getPayments();
  }, []);

  const getPayments = () => {
    api.get("payments")
    .then((res) => {
      console.log(res.data);
      setPayments(res.data);
    })
    .catch((err) => {
      console.error(err);
    });
  };

  function handleDelete(id: number) {
    api.delete(`delete-payment`, {
      params: {
        id: id,
      }
    })
    .then((res) => {
      console.log(res.data);
      getPayments();
    })
    .catch((err) => {
      console.error(err);
    });
  }

  return (
    <>
    <div className="container-xxl flex-grow-1 container-p-y">
      <h4 className="fw-bold py-3 mb-4"><Link to="payments" className="text-muted fw-light">Payments </Link> / Manage</h4>
      <Link to="/create-payment" className="btn btn-primary">Add New</Link>
      <div className="card mt-3">
        <div className="table-responsive">
            <table className="table table-striped">
                <thead>
                    <tr>
                                            <th>Payment Id</th>
                        <th>Booking Id</th>
                        <th>Amount</th>
                        <th>Payment Date</th>
                        <th>Payment Method Id</th>
                        <th>Payment Status Id</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {
                        payments.map((item) => (
                            <tr key={item.id}>
                                <td>{item.payment_id}</td>
                                <td>{item.booking_id}</td>
                                <td>{item.amount}</td>
                                <td>{item.payment_date}</td>
                                <td>{item.payment_method_id}</td>
                                <td>{item.payment_status_id}</td>
                                <td>
                                    <div className="d-flex gap-1">
                                        <Link to={`/payment/details/${item.id}`} className="btn btn-icon btn-outline-info">
                                            <span className="tf-icons bx bx-search"></span>
                                        </Link>
                                        <Link to={`/payment/edit/${item.id}`} className="btn btn-icon btn-outline-primary">
                                            <span className="tf-icons bx bx-edit"></span>
                                        </Link>
                                        <button type="button" className="btn btn-icon btn-outline-danger" onClick={() => setPaymentId(item.id)} data-bs-toggle="modal" data-bs-target="#deleteModal">
                                            <span className="tf-icons bx bx-trash"></span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        ))
                    }
                </tbody>
            </table>
        </div>
      </div>
    </div>

    {/* Delete modal */}
    <div className="modal" id="deleteModal" tabIndex={-1}>
      <div className="modal-dialog">
        <div className="modal-content">
          <div className="modal-header">
            <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div className="modal-body text-center">
            <span className="bx bx-trash fs-1 text-danger mb-3"></span>
            <h5 className="text-center mb-0">Are you sure you want to delete?</h5>
          </div>
          <div className="modal-footer justify-content-center">
            <button type="button" className="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" className="btn btn-danger" data-bs-dismiss="modal" onClick={() => handleDelete(paymentId!)}>Delete</button>
          </div>
        </div>
      </div>
    </div>
    </>
  );
}

export default ManagePayment;