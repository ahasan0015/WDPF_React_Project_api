import { Link, useParams } from "react-router-dom";
import api from "../../../config";
import { useEffect, useState } from "react";
import type { PaymentStatu } from "../../../interfaces/paymentStatu.interface";
import paymentStatuDefault from "../../../interfaces/paymentStatu.interface";

function DetailsPaymentStatu() {
  const [paymentStatu, setPaymentStatu] = useState<PaymentStatu>(paymentStatuDefault);
  const { id } = useParams();

  useEffect(() => {
    document.title = "Details PaymentStatu";
    api.get("payment-statu?id=" + id)
      .then((res) => {
        setPaymentStatu(res.data);
      })
      .catch((err) => {
        console.error(err);
      });
  }, [id]);

  return (
    <div className="container-xxl flex-grow-1 container-p-y">
      <h4 className="fw-bold py-3 mb-4">
        <Link to="/payment-status" className="text-muted fw-light">PaymentStatus /</Link> Details
      </h4>
      <div className="card">
        <div className="table-responsive text-nowrap">
          <table className="table table-bordered">
            <tbody>
              <tr>
                <th>Payment Status Id</th>
                <td>{paymentStatu.payment_status_id}</td>
              </tr>
              <tr>
                <th>Status Name</th>
                <td>{paymentStatu.status_name}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  );
}

export default DetailsPaymentStatu;