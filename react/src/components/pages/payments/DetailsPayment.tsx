import { Link, useParams } from "react-router-dom";
import api from "../../../config";
import { useEffect, useState } from "react";
import type { Payment } from "../../../interfaces/payment.interface";
import paymentDefault from "../../../interfaces/payment.interface";

function DetailsPayment() {
  const [payment, setPayment] = useState<Payment>(paymentDefault);
  const { id } = useParams();

  useEffect(() => {
    document.title = "Details Payment";
    api.get("payment?id=" + id)
      .then((res) => {
        setPayment(res.data);
      })
      .catch((err) => {
        console.error(err);
      });
  }, [id]);

  return (
    <div className="container-xxl flex-grow-1 container-p-y">
      <h4 className="fw-bold py-3 mb-4">
        <Link to="/payments" className="text-muted fw-light">Payments /</Link> Details
      </h4>
      <div className="card">
        <div className="table-responsive text-nowrap">
          <table className="table table-bordered">
            <tbody>
              <tr>
                <th>Payment Id</th>
                <td>{payment.payment_id}</td>
              </tr>
              <tr>
                <th>Booking Id</th>
                <td>{payment.booking_id}</td>
              </tr>
              <tr>
                <th>Amount</th>
                <td>{payment.amount}</td>
              </tr>
              <tr>
                <th>Payment Date</th>
                <td>{payment.payment_date}</td>
              </tr>
              <tr>
                <th>Payment Method Id</th>
                <td>{payment.payment_method_id}</td>
              </tr>
              <tr>
                <th>Payment Status Id</th>
                <td>{payment.payment_status_id}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  );
}

export default DetailsPayment;