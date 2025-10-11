import { useEffect, useState } from "react";
import api from "../../../config";
import type { SeatClass } from "../../../interfaces/seatClass.interface";
import { Link } from "react-router-dom";
import { baseUrl } from "../../../config";

function ManageSeatClass() {
  const [seatClasss, setSeatClasss] = useState<SeatClass[]>([]);
  const [seatClassId, setSeatClassId] = useState<number | undefined>(0);

  useEffect(() => {
    document.title = "Manage SeatClasss";
    getSeatClasss();
  }, []);

  const getSeatClasss = () => {
    api.get("seat-classes")
    .then((res) => {
      console.log(res.data);
      setSeatClasss(res.data);
    })
    .catch((err) => {
      console.error(err);
    });
  };

  function handleDelete(id: number) {
    api.delete(`delete-seatClass`, {
      params: {
        id: id,
      }
    })
    .then((res) => {
      console.log(res.data);
      getSeatClasss();
    })
    .catch((err) => {
      console.error(err);
    });
  }

  return (
    <>
    <div className="container-xxl flex-grow-1 container-p-y">
      <h4 className="fw-bold py-3 mb-4"><Link to="seat-classes" className="text-muted fw-light">SeatClasss </Link> / Manage</h4>
      <Link to="/create-seatClass" className="btn btn-primary">Add New</Link>
      <div className="card mt-3">
        <div className="table-responsive">
            <table className="table table-striped">
                <thead>
                    <tr>
                                            <th>Seat Class Id</th>
                        <th>Class Name</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    {
                        seatClasss.map((item) => (
                            <tr key={item.id}>
                                <td>{item.seat_class_id}</td>
                                <td>{item.class_name}</td>
                                <td>
                                    <div className="d-flex gap-1">
                                        <Link to={`/seatClass/details/${item.id}`} className="btn btn-icon btn-outline-info">
                                            <span className="tf-icons bx bx-search"></span>
                                        </Link>
                                        <Link to={`/seatClass/edit/${item.id}`} className="btn btn-icon btn-outline-primary">
                                            <span className="tf-icons bx bx-edit"></span>
                                        </Link>
                                        <button type="button" className="btn btn-icon btn-outline-danger" onClick={() => setSeatClassId(item.id)} data-bs-toggle="modal" data-bs-target="#deleteModal">
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
            <button type="button" className="btn btn-danger" data-bs-dismiss="modal" onClick={() => handleDelete(seatClassId!)}>Delete</button>
          </div>
        </div>
      </div>
    </div>
    </>
  );
}

export default ManageSeatClass;