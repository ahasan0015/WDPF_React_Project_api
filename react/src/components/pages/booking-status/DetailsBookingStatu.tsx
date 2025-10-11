import { Link, useParams } from "react-router-dom";
import api from "../../../config";
import { useEffect, useState } from "react";
import type { BookingStatu } from "../../../interfaces/bookingStatu.interface";
import bookingStatuDefault from "../../../interfaces/bookingStatu.interface";

function DetailsBookingStatu() {
  const [bookingStatu, setBookingStatu] = useState<BookingStatu>(bookingStatuDefault);
  const { id } = useParams();

  useEffect(() => {
    document.title = "Details BookingStatu";
    api.get("booking-statu?id=" + id)
      .then((res) => {
        setBookingStatu(res.data);
      })
      .catch((err) => {
        console.error(err);
      });
  }, [id]);

  return (
    <div className="container-xxl flex-grow-1 container-p-y">
      <h4 className="fw-bold py-3 mb-4">
        <Link to="/booking-status" className="text-muted fw-light">BookingStatus /</Link> Details
      </h4>
      <div className="card">
        <div className="table-responsive text-nowrap">
          <table className="table table-bordered">
            <tbody>
              <tr>
                <th>Status Id</th>
                <td>{bookingStatu.status_id}</td>
              </tr>
              <tr>
                <th>Status Name</th>
                <td>{bookingStatu.status_name}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  );
}

export default DetailsBookingStatu;