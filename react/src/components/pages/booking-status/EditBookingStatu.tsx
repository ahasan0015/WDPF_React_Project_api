import { Link, useParams } from "react-router-dom";
import api from "../../../config";
import { useEffect, useState } from "react";
import type { BookingStatu } from "../../../interfaces/bookingStatu.interface";
import bookingStatuDefault from "../../../interfaces/bookingStatu.interface";

function EditBookingStatu() {
    const [bookingStatu, setBookingStatu] = useState<BookingStatu>(bookingStatuDefault);
    const { id } = useParams();

    useEffect(() => {
        document.title = "Edit BookingStatu";
        getDataById();
        getStatuss();
    }, []);

    const getDataById = () => {
        api.get("booking-status/" + id)
        .then((res) => {
            setBookingStatu(res.data);
        })
        .catch((err) => {
            console.error(err);
        });
    };
    const [statuss, setStatus] = useState([]);
    const getStatuss = () => {
        api.get("statuss")
        .then((res) => {
            setStatus(res.data);
        })
        .catch((err) => {
            console.error(err);
        });
    };
    const handleSubmit = (e: React.FormEvent) => {
        e.preventDefault();
        api.put("edit-booking-statu?id=" + id, bookingStatu)
        .then((res) => {
            console.log(res.data);
        })
        .catch((err) => {
            console.error(err);
        });
    };
    return (
        <>
        <div className="container-xxl flex-grow-1 container-p-y">
          <h4 className="fw-bold py-3 mb-4">
            <Link to="/booking-status" className="text-muted fw-light">BookingStatus /</Link> Edit
          </h4>
          <div className="card mt-3">
            <h5 className="card-header">Edit BookingStatu</h5>
            <div className="card-body">
                <form onSubmit={handleSubmit}>
                    <div className="mb-3">
                        <label className="form-label">Status Id</label>
                        <select name="status_id" className="form-select"
                        value={bookingStatu.status_id}
                        onChange={(e) => setBookingStatu({...bookingStatu, status_id: parseInt(e.target.value)})}>
                            {
                                statuss.map((item) =>
                                    <option value={item.id} key={item.id}>{item.name}</option>
                                )
                            }
                        </select>
                    </div>
                    <div className="mb-3">
                        <label className="form-label">Status Name</label>
                        <input type="text" name="status_name" className="form-control"
                        value={bookingStatu.status_name}
                        onChange={(e) => setBookingStatu({...bookingStatu, status_name: e.target.value})} />
                    </div>
                    <button type="submit" className="btn btn-primary">Update</button>
                </form>
            </div>
          </div>
        </div>
        </>
    );
}

export default EditBookingStatu;