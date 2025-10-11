import { Link, useParams } from "react-router-dom";
import api from "../../../config";
import { useEffect, useState } from "react";
import type { BookingType } from "../../../interfaces/bookingType.interface";
import bookingTypeDefault from "../../../interfaces/bookingType.interface";

function DetailsBookingType() {
  const [bookingType, setBookingType] = useState<BookingType>(bookingTypeDefault);
  const { id } = useParams();

  useEffect(() => {
    document.title = "Details BookingType";
    api.get("booking-type?id=" + id)
      .then((res) => {
        setBookingType(res.data);
      })
      .catch((err) => {
        console.error(err);
      });
  }, [id]);

  return (
    <div className="container-xxl flex-grow-1 container-p-y">
      <h4 className="fw-bold py-3 mb-4">
        <Link to="/booking-types" className="text-muted fw-light">BookingTypes /</Link> Details
      </h4>
      <div className="card">
        <div className="table-responsive text-nowrap">
          <table className="table table-bordered">
            <tbody>
              <tr>
                <th>Booking Type Id</th>
                <td>{bookingType.booking_type_id}</td>
              </tr>
              <tr>
                <th>Type Name</th>
                <td>{bookingType.type_name}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  );
}

export default DetailsBookingType;