import { Link, useParams } from "react-router-dom";
import api from "../../../config";
import { useEffect, useState } from "react";
import type { Booking } from "../../../interfaces/booking.interface";
import bookingDefault from "../../../interfaces/booking.interface";

function DetailsBooking() {
  const [booking, setBooking] = useState<Booking>(bookingDefault);
  const { id } = useParams();

  useEffect(() => {
    document.title = "Details Booking";
    api.get("booking?id=" + id)
      .then((res) => {
        setBooking(res.data);
      })
      .catch((err) => {
        console.error(err);
      });
  }, [id]);

  return (
    <div className="container-xxl flex-grow-1 container-p-y">
      <h4 className="fw-bold py-3 mb-4">
        <Link to="/bookings" className="text-muted fw-light">Bookings /</Link> Details
      </h4>
      <div className="card">
        <div className="table-responsive text-nowrap">
          <table className="table table-bordered">
            <tbody>
              <tr>
                <th>Booking Id</th>
                <td>{booking.booking_id}</td>
              </tr>
              <tr>
                <th>User Id</th>
                <td>{booking.user_id}</td>
              </tr>
              <tr>
                <th>Booking Type Id</th>
                <td>{booking.booking_type_id}</td>
              </tr>
              <tr>
                <th>Booking Date</th>
                <td>{booking.booking_date}</td>
              </tr>
              <tr>
                <th>Total Price</th>
                <td>{booking.total_price}</td>
              </tr>
              <tr>
                <th>Status Id</th>
                <td>{booking.status_id}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  );
}

export default DetailsBooking;