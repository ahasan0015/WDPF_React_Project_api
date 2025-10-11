import { Link, useParams } from "react-router-dom";
import api from "../../../config";
import { useEffect, useState } from "react";
import type { SeatClass } from "../../../interfaces/seatClass.interface";
import seatClassDefault from "../../../interfaces/seatClass.interface";

function DetailsSeatClass() {
  const [seatClass, setSeatClass] = useState<SeatClass>(seatClassDefault);
  const { id } = useParams();

  useEffect(() => {
    document.title = "Details SeatClass";
    api.get("seat-class?id=" + id)
      .then((res) => {
        setSeatClass(res.data);
      })
      .catch((err) => {
        console.error(err);
      });
  }, [id]);

  return (
    <div className="container-xxl flex-grow-1 container-p-y">
      <h4 className="fw-bold py-3 mb-4">
        <Link to="/seat-classes" className="text-muted fw-light">SeatClasss /</Link> Details
      </h4>
      <div className="card">
        <div className="table-responsive text-nowrap">
          <table className="table table-bordered">
            <tbody>
              <tr>
                <th>Seat Class Id</th>
                <td>{seatClass.seat_class_id}</td>
              </tr>
              <tr>
                <th>Class Name</th>
                <td>{seatClass.class_name}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  );
}

export default DetailsSeatClass;