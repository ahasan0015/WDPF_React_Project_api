import { Link, useParams } from "react-router-dom";
import api from "../../../config";
import { useEffect, useState } from "react";
import type { OrderStatu } from "../../../interfaces/orderStatu.interface";
import orderStatuDefault from "../../../interfaces/orderStatu.interface";

function DetailsOrderStatu() {
  const [orderStatu, setOrderStatu] = useState<OrderStatu>(orderStatuDefault);
  const { id } = useParams();

  useEffect(() => {
    document.title = "Details OrderStatu";
    api.get("order-statu?id=" + id)
      .then((res) => {
        setOrderStatu(res.data);
      })
      .catch((err) => {
        console.error(err);
      });
  }, [id]);

  return (
    <div className="container-xxl flex-grow-1 container-p-y">
      <h4 className="fw-bold py-3 mb-4">
        <Link to="/order-status" className="text-muted fw-light">OrderStatus /</Link> Details
      </h4>
      <div className="card">
        <div className="table-responsive text-nowrap">
          <table className="table table-bordered">
            <tbody>
              <tr>
                <th>Id</th>
                <td>{orderStatu.id}</td>
              </tr>
              <tr>
                <th>Name</th>
                <td>{orderStatu.name}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  );
}

export default DetailsOrderStatu;