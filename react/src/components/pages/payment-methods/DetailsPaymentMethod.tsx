import { Link, useParams } from "react-router-dom";
import api from "../../../config";
import { useEffect, useState } from "react";
import type { PaymentMethod } from "../../../interfaces/paymentMethod.interface";
import paymentMethodDefault from "../../../interfaces/paymentMethod.interface";

function DetailsPaymentMethod() {
  const [paymentMethod, setPaymentMethod] = useState<PaymentMethod>(paymentMethodDefault);
  const { id } = useParams();

  useEffect(() => {
    document.title = "Details PaymentMethod";
    api.get("payment-method?id=" + id)
      .then((res) => {
        setPaymentMethod(res.data);
      })
      .catch((err) => {
        console.error(err);
      });
  }, [id]);

  return (
    <div className="container-xxl flex-grow-1 container-p-y">
      <h4 className="fw-bold py-3 mb-4">
        <Link to="/payment-methods" className="text-muted fw-light">PaymentMethods /</Link> Details
      </h4>
      <div className="card">
        <div className="table-responsive text-nowrap">
          <table className="table table-bordered">
            <tbody>
              <tr>
                <th>Payment Method Id</th>
                <td>{paymentMethod.payment_method_id}</td>
              </tr>
              <tr>
                <th>Method Name</th>
                <td>{paymentMethod.method_name}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  );
}

export default DetailsPaymentMethod;